$(document).ready(function () {
    $('.summernote').summernote({
        placeholder: "Tulis konten di sini...",
        tabsize: 2,
        height: 300,
        callbacks: {
            onImageUpload: function (files) {
                for (let i = 0; i < files.length; i++) {
                    uploadImage(files[i], this);
                }
            }
        }
    });
});

function uploadImage(file, editor) {
    let data = new FormData();
    data.append("file", file);

    $.ajax({
        url: "/admin/upload-image",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        method: "POST",
        data: data,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.location) {
                $(editor).summernote("insertImage", response.location);
            } else {
                alert("Upload gagal.");
            }
        },
        error: function (error) {
            console.error(error);
            alert("Terjadi kesalahan saat mengupload gambar.");
        }
    });
}
