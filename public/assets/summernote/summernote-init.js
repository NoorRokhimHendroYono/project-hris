$(document).ready(function () {
    $('.summernote').each(function () {
        // Cegah Duplikat Summernote
        if (!$(this).next().hasClass('note-editor')) {
            $(this).summernote({
                placeholder: "Tulis konten di sini...",
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style', 'fontname', 'fontsize']], // Grup untuk style, font, ukuran
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']], // Grup untuk format teks
                    ['color', ['color']], // Grup untuk warna teks
                    ['para', ['ul', 'ol', 'paragraph', 'height']], // Grup untuk paragraf (termasuk bullet/numbered list)
                    ['insert', ['link', 'picture', 'video', 'table', 'hr']], // Grup untuk sisipkan (link, gambar, video, tabel, garis horizontal)
                    ['view', ['fullscreen', 'codeview', 'help']] // Grup untuk tampilan (fullscreen, code view, help)
                ],
                // *** Akhir BAGIAN PENTING ***
                callbacks: {
                    onImageUpload: function (files) {
                        for (let i = 0; i < files.length; i++) {
                            uploadImage(files[i], this);
                        }
                    }
                }
            });
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
