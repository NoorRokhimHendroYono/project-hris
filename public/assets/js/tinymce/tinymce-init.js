// tinymce.init({
//     selector: 'textarea.tinymce',
//     plugins: 'image code link lists',
//     toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | image code',
//     height: 400,
//     automatic_uploads: true,
//     images_upload_url: '/admin/upload-image',
//     images_upload_credentials: true, // ✅ Boleh ada
//     relative_urls: false,
//     remove_script_host: false,
//     convert_urls: true,
//     file_picker_types: 'image',

//     file_picker_callback: function(callback, value, meta) {
//         if (meta.filetype === 'image') {
//             let input = document.createElement('input');
//             input.setAttribute('type', 'file');
//             input.setAttribute('accept', 'image/*');
//             input.onchange = function() {
//                 let file = this.files[0];
//                 let reader = new FileReader();
//                 reader.onload = function () {
//                     let id = 'blobid' + (new Date()).getTime();
//                     let blobCache = tinymce.activeEditor.editorUpload.blobCache;
//                     let base64 = reader.result.split(',')[1];
//                     let blobInfo = blobCache.create(id, file, base64);
//                     blobCache.add(blobInfo);
//                     callback(blobInfo.blobUri(), { title: file.name });
//                 };
//                 reader.readAsDataURL(file);
//             };
//             input.click();
//         }
//     },

//     images_upload_handler: function (blobInfo, success, failure) {
//         let xhr = new XMLHttpRequest();
//         xhr.open('POST', '/admin/upload-image');
//         xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
//         xhr.onload = function() {
//             if (xhr.status !== 200) {
//                 failure('HTTP Error: ' + xhr.status);
//                 return;
//             }
//             let json = JSON.parse(xhr.responseText);
//             if (!json || typeof json.location !== 'string') {
//                 failure('Invalid response from server');
//                 return;
//             }
//             success(json.location);
//         };
//         let formData = new FormData();
//         formData.append('file', blobInfo.blob(), blobInfo.filename());
//         xhr.send(formData);
//     }
// });
