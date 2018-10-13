function showProcessingOverlay()
    {
       var doc_height = $(document).height();
       var doc_width = $(document).width();
       
       
        var spinner_html = "http://172.10.1.5:8050/spring.gif";
       

      // $("body").append("<div id='global_processing_overlay'><div class='container'><img src="+spinner_html+"/></div></div>");
       $("body").append("<div id='global_processing_overlay'><div style='position: absolute;left:46%;top:35%;'><img style='max-width:67%' src='"+spinner_html+"'/></div></div>");
       

       $("#global_processing_overlay").height(doc_height)
                                     .css({
                                      
                                       'position': 'fixed',
                                       'top': 0,
                                       'left': 0,
                                       'background': 'rgba(0, 0, 0, 0.7)',
                                       'width': '100%',
                                       'z-index': 999999,
                                       'text-align': 'center',
                                       'vertical-align': 'middle',
                                       'margin': 'auto',

                                     });                             
    }

    function hideProcessingOverlay()
    {
      $("#global_processing_overlay").remove();
    } 
