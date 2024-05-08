function uploadFile(event) {
    var file = event.target.files[0];
    var formData = new FormData();
    formData.append("fileToUpload", file);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "upload.php", true); // Point to the PHP script on the web server
    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                // If upload was successful, display the uploaded photo in the gallery
                var preview = document.getElementById('photo-gallery');
                var img = document.createElement('img');
                img.src = response.fileUrl;
                preview.appendChild(img);
            } else {
                alert("Error: " + response.message);
            }
        } else {
            alert("Error: " + xhr.statusText);
        }
    };
    xhr.send(formData);
}