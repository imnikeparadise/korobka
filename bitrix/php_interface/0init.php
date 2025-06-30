<?php
AddEventHandler("form", "onAfterFormResultAdd", "SendOneClickToN8N");
function SendOneClickToN8N($WEB_FORM_ID, $RESULT_ID) {
    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/oneclick_debug.log', date('c').": onAfterFormResultAdd: $WEB_FORM_ID, $RESULT_ID\n", FILE_APPEND);

    if ($WEB_FORM_ID == 1) { // ID формы "1 клик"
        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/oneclick_debug.log', date('c').": OneClick form detected\n", FILE_APPEND);

        if (CModule::IncludeModule("form")) {
            $arAnswers = [];
            CFormResult::GetDataByID($RESULT_ID, array(), $arQuestions, $arAnswers2);
            foreach ($arAnswers2 as $field => $answer) {
                $arAnswers[$field] = $answer[0]['USER_TEXT'];
            }

            file_put_contents($_SERVER['DOCUMENT_ROOT'].'/oneclick_debug.log', date('c').": Data: ".print_r($arAnswers,1)."\n", FILE_APPEND);

            $webhookUrl = 'https://primary-production-0439.up.railway.app/webhook/96e79d21-fabe-4e3d-b1aa-75fd7c20e70f';

            $ch = curl_init($webhookUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['oneclick' => $arAnswers]));
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
            curl_setopt($ch, CURLOPT_TIMEOUT, 3);
            $result = curl_exec($ch);
            file_put_contents($_SERVER['DOCUMENT_ROOT'].'/oneclick_debug.log', date('c').": CURL result: $result | ".curl_error($ch)."\n", FILE_APPEND);
            curl_close($ch);
        }
    }
}