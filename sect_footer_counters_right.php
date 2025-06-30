<script>
  (function(d,t) {
    var BASE_URL="https://chatwoot-production-af3a.up.railway.app";
    var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=BASE_URL+"/packs/js/sdk.js";
    g.defer = true;
    g.async = true;
    s.parentNode.insertBefore(g,s);
    g.onload=function(){
      window.chatwootSDK.run({
        websiteToken: 'ZFGb6aT7agDLhPyQoDe4HDP4',
        baseUrl: BASE_URL
      })
    }
  })(document,"script");
</script>