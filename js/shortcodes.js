// Add TinyMCE Button- Insert responsive video frame
    (function() {  
        tinymce.create('tinymce.plugins.iframe', {  
            init : function(ed, url) {  
                ed.addButton('videoframe', {  
                    title : 'Add Responsive Video Shortcode',  
                    image : url+'/icon/video.png',  
                    onclick : function() {  
                         ed.selection.setContent('[responsivevideo] <br><p>' + ed.selection.getContent() + '<br></p> [/responsivevideo]');  
                    }  
                });  
            },  
            createControl : function(n, cm) {  
                return null;  
            },  
        });  
        tinymce.PluginManager.add('videoframe', tinymce.plugins.iframe);  
    })();  