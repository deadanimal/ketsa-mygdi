    // Grab id from url parameter
    var baseUrl = (window.location).href; // You can also use document.URL
    var url = baseUrl.substring(baseUrl.lastIndexOf('url=') + 4);
    var mapServiceUrl;

    if (baseUrl == url) {

        console.log("Map Service Url not included..");
        mapServiceUrl = "";
    
      } else if(baseUrl != url) {
    
        console.log(url);
        mapServiceUrl = url
    
      } else {
    
        console.log("Map Services Not Available");
        mapServiceUrl = "";
    
      }

     function openWebInNewTab(param) {

      document.getElementById("viewWebsite").innerHTML = window.open(param);

     } 


   
    