jQuery(document).ready(function(){

    (function() {
        var my_shortcodes = ['List', 'List item', 'Icon'];

        tinymce.create('tinymce.plugins.shortcode', {
     
            init : function(ed, url) {
            },
            createControl : function(n, cm) {
     
                if(n=='shortcode'){
                    var mlb = cm.createListBox('shortcode', {
                         title : 'shortcode',
                         onselect : function(v) {
                            if(tinyMCE.activeEditor.selection.getContent() == ''){
                                
                                if (v=="List") {
                                    var content = '[list][/list]';
                                    tinyMCE.activeEditor.selection.setContent( content );
                                }
                                if (v=="List item") {
                                    var content = '[list_item style="1"][/list_item]';
                                    tinyMCE.activeEditor.selection.setContent( content );
                                }
                                if (v=="Icon") {
                                    var content = '[icon name="fa-facebook"]';
                                    tinyMCE.activeEditor.selection.setContent( content );
                                }
                            
                            }
                         }
                    });
     
                    for(var i in my_shortcodes)
                        mlb.add(my_shortcodes[i],my_shortcodes[i]);
     
                    return mlb;
                }
                return null;
            }
     
     
        });
        tinymce.PluginManager.add('shortcode', tinymce.plugins.shortcode);
    })();


});