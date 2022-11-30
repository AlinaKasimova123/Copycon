function tinyMCEEditor(id) {
    tinymce.init({
        selector: 'textarea',
        mode : "textareas",
        plugins: 'paste code image code table',
        toolbar: 'undo redo | link image | code',
        height: "400",
        image_title: true,
        automatic_uploads: true,
        forced_root_block : '',
        menu: {
            file: { 
                title: 'File', 
                items: 'newdocument restoredraft | preview | print' 
            },
            edit: { 
                title: 'Edit', 
                items: 'undo redo | cut copy paste | selectall | searchreplace' 
            },
            view: { 
                title: 'View', 
                items: 'code | visualaid visualchars visualblocks | preview fullscreen' 
            },
            insert: { 
                title: 'Insert', 
                items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime' 
            },
            format: { 
                title: 'Format', 
                items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align | forecolor backcolor | removeformat' 
            },
            tools: { 
                title: 'Tools', 
                items: 'code wordcount' 
            },
            table: { 
                title: 'Table', 
                items: 'inserttable | cell row column | tableprops deletetable' 
            }
        },
        branding: false,
        //forced_root_block : false,
        mobile: {
            menubar: true
        },
        file_picker_types: 'image',
        /* and here's our custom image picker*/
        file_picker_callback: function (cb, value, meta) {
          let input = document.createElement('input');
          input.setAttribute('type', 'file');
          input.setAttribute('accept', 'image/*');
          input.onchange = function () {
            let file = this.files[0];
            let reader = new FileReader();
            reader.onload = function () {
            let id = 'blobid' + (new Date()).getTime();
            let blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            let base64 = reader.result.split(',')[1];
            let blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);
            cb(blobInfo.blobUri(), { title: file.name });
            };
            reader.readAsDataURL(file);
          };
      
          input.click();
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
      });
    };

// insert record in database
jQuery(document).ready(function() {
    tinyMCEEditor('event-content');   
    jQuery(document).on('click','#save-event', function(e) {
        e.preventDefault();
        tinyMCE.triggerSave(true, true);
        tinyMCE.activeEditor.setContent('');
        jQuery.ajax({
                url: "action.php",
                method: "POST",              
                data:jQuery("form#dynamic-post").serialize(),
                dataType:"html",
                success: function(html) {     
                    jQuery("#render-event-data").append(html).fadeIn('slow');
                    tinyMCE.get('event-content').setContent('');
                    jQuery('input#event-title').val('');
                    jQuery('input#event-location').val('');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
        }); 
    });

    // update record in database
    jQuery(document).on('click','.update-event', function(e) {
        e.preventDefault();
        let event_id = jQuery(this).data('ueventid');
        let edtor_id = 'event-content'+event_id;
        //tinyMCE.EditorManager.execCommand('mceFocus', false, edtor_id);
        //tinyMCE.EditorManager.execCommand('mceRemoveEditor', true, edtor_id);
        tinyMCEEditor(edtor_id);
        let action ='fetch_event';
        jQuery.ajax({
                url: "action.php",
                method: "POST",              
                data:{action:action, event_id:event_id},
                dataType:"html",
                success: function(html) {     
                    jQuery("#dyn-"+event_id).html(html).fadeIn('slow');
                    //tinyMCE.activeEditor.setContent();
                    tinyMCE.EditorManager.execCommand('mceAddEditor', false, edtor_id);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
        }); 
    });

    // update record in database
    jQuery(document).on('click','.save-update', function(e) {
        e.preventDefault();
        tinyMCE.triggerSave(true, true);
        let event_id = jQuery(this).data('seventid');
        let edtor_id = 'event-content'+event_id;
        tinyMCE.EditorManager.execCommand('mceFocus', false, edtor_id);
        tinyMCE.EditorManager.execCommand('mceRemoveEditor', true, edtor_id);
        jQuery.ajax({
                url: "action.php",
                method: "POST",              
                data:jQuery("form#dynamic-post-"+event_id).serialize(),
                dataType:"html",
                success: function(html) {     
                    jQuery("#dyn-"+event_id).html(html).fadeIn('slow');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
        }); 
    });


    // update record in database
    jQuery(document).on('click','.delete-event', function(e) {
        e.preventDefault();
        let event_id = jQuery(this).data('deventid');
        let action = 'delete';
        jQuery.ajax({
                url: "action.php",
                method: "POST",              
                data:{event_id:event_id, action:action},
                dataType:"json",
                success: function(json) {     
                    jQuery("#dyn-"+event_id).empty('').fadeIn('slow');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
        }); 
    });
});