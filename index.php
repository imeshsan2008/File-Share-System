<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .file-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .file-item .file-name {
            flex-grow: 1;
        }

        .file-item .progress {
            flex-grow: 2;
            margin-left: 10px;
            width: 100%;
        }

        .file-item .btn {
            margin-left: 10px;
        }

        .progress-bar {
            width: 100% !important;
        }

        .hidden {
            display: none;
        }

        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .file-info {
            flex-grow: 1;
        }

        .file-checkbox {
            margin-left: 10px;
        }

        #submit {
            display: flex;
            flex-direction: column;
            gap: 10px;
            position: relative;
            left: 82%;
        }

        #submit button {
            width: 200px;
        }

        .controls-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        #toast {
    visibility: hidden;
    max-width: 50px;
    height: 50px;
    /*margin-left: -125px;*/
    margin: auto;
    background-color: rgb(113, 203, 255);
    color: black;
    text-align: center;
    border-radius: 2px;

    position: fixed;
    z-index: 1;
    left: 0;right:0;
    bottom: 30px;
    font-size: 17px;
    white-space: nowrap;
}
#toast #img{
	width: 50px;
	height: 50px;
    
    float: left;
    
    padding-top: 16px;
    padding-bottom: 16px;
    
    box-sizing: border-box;

    
    background-color:  rgb(113, 203, 255);
    color: black;
}
#toast #desc{

    
    color: black;
   
    padding: 16px;
    
    overflow: hidden;
	white-space: nowrap;
}

#toast.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 2s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 4s, fadeout 0.5s 4.5s;
    
}
#toast2 {
    visibility: hidden;
    max-width: 50px;
    height: 50px;
    /*margin-left: -125px;*/
    margin: auto;
    background-color: rgb(0, 142, 19);
    color: black;
    text-align: center;
    border-radius: 2px;

    position: fixed;
    z-index: 1;
    left: 0;right:0;
    bottom: 30px;
    font-size: 17px;
    white-space: nowrap;
}
#toast2 #img{
	width: 50px;
	height: 50px;
    
    float: left;
    
    padding-top: 16px;
    padding-bottom: 16px;
    
    box-sizing: border-box;

    
    background-color: rgb(0, 142, 19);
    color: rgb(255, 255, 255);
}
#toast2 #desc{

    
    color: rgb(255, 255, 255);
   
    padding: 16px;
    
    overflow: hidden;
	white-space: nowrap;
}

#toast2.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 2s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 4s, fadeout 0.5s 4.5s;
}
#toast {
    visibility: hidden;
    max-width: 50px;
    height: 50px;
    /*margin-left: -125px;*/
    margin: auto;
    background-color: rgb(113, 203, 255);
    color: black;
    text-align: center;
    border-radius: 2px;

    position: fixed;
    z-index: 1;
    left: 0;right:0;
    bottom: 30px;
    font-size: 17px;
    white-space: nowrap;
}
#toast #img{
	width: 50px;
	height: 50px;
    
    float: left;
    
    padding-top: 16px;
    padding-bottom: 16px;
    
    box-sizing: border-box;

    
    background-color:  rgb(113, 203, 255);
    color: black;
}
#toast #desc{

    
    color: black;
   
    padding: 16px;
    
    overflow: hidden;
	white-space: nowrap;
}

#toast.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 2s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 4s, fadeout 0.5s 4.5s;
    
}
#toast3 {
    visibility: hidden;
    max-width: 50px;
    height: 50px;
    /*margin-left: -125px;*/
    margin: auto;
    background-color: rgb(132, 0, 0);
    color: rgb(255, 255, 255);
    text-align: center;
    border-radius: 2px;

    position: fixed;
    z-index: 1;
    left: 0;right:0;
    bottom: 30px;
    font-size: 17px;
    white-space: nowrap;
}
#toast3 #img{
	width: 50px;
	height: 50px;
    
    float: left;
    
    padding-top: 16px;
    padding-bottom: 16px;
    
    box-sizing: border-box;

    
    background-color:   rgb(132, 0, 0);
    color: rgb(255, 255, 255);
}
#toast3 #desc{

    
    color: black;
   
    padding: 16px;
    
    overflow: hidden;
	white-space: nowrap;
}

#toast3.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 2s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 4s, fadeout 0.5s 4.5s;
}
#toast4 {
    visibility: hidden;
    max-width: 50px;
    height: 50px;
    /*margin-left: -125px;*/
    margin: auto;
    background-color: rgb(132, 0, 0);
    color: rgb(255, 255, 255);
    text-align: center;
    border-radius: 2px;

    position: fixed;
    z-index: 1;
    left: 0;right:0;
    bottom: 30px;
    font-size: 17px;
    white-space: nowrap;
}
#toast4 #img{
	width: 50px;
	height: 50px;
    
    float: left;
    
    padding-top: 16px;
    padding-bottom: 16px;
    
    box-sizing: border-box;

    
    background-color:   rgb(132, 0, 0);
    color: rgb(255, 255, 255);
}
#toast4 #desc{

    
    color: rgb(255, 255, 255);
   
    padding: 16px;
    
    overflow: hidden;
	white-space: nowrap;
}

#toast4.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 2s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 4s, fadeout 0.5s 4.5s;
}#toast5 {
    visibility: hidden;
    max-width: 50px;
    height: 50px;
    /*margin-left: -125px;*/
    margin: auto;
    background-color: rgb(0, 142, 19);
    color: rgb(255, 255, 255);
    text-align: center;
    border-radius: 2px;

    position: fixed;
    z-index: 1;
    left: 0;right:0;
    bottom: 30px;
    font-size: 17px;
    white-space: nowrap;
}
#toast5 #img{
	width: 50px;
	height: 50px;
    
    float: left;
    
    padding-top: 16px;
    padding-bottom: 16px;
    
    box-sizing: border-box;

    
    background-color:   rgb(0, 142, 19);
    color: rgb(255, 255, 255);
}
#toast5 #desc{

    
    color: white;
   
    padding: 16px;
    
    overflow: hidden;
	white-space: nowrap;
}

#toast5.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 2s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 4s, fadeout 0.5s 4.5s;
}
@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;} 
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes expand {
    from {min-width: 50px} 
    to {min-width: 350px}
}

@keyframes expand {
    from {min-width: 50px}
    to {min-width: 350px}
}
@-webkit-keyframes stay {
    from {min-width: 350px} 
    to {min-width: 350px}
}

@keyframes stay {
    from {min-width: 350px}
    to {min-width: 350px}
}
@-webkit-keyframes shrink {
    from {min-width: 350px;} 
    to {min-width: 50px;}
}

@keyframes shrink {
    from {min-width: 350px;} 
    to {min-width: 50px;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;} 
    to {bottom: 60px; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 60px; opacity: 0;}
}
/* Add this CSS to your existing style block */

/* Center the logo on larger screens */
@media (min-width: 768px) {
    .logo-container {

        display: flex;
        justify-content: center;
    }
}

/* Align the logo to the right on smaller screens */
@media (max-width: 767.98px) {
    .logo-container {
        display: flex;

        justify-content: center;
    }
}

    </style>
</head>

<body onload="check_del();">
<div id="toast"><div id="img">Info</div><div id="desc">Please select at least one file</div></div>
<div id="toast2"><div id="img">Success</div><div id="desc">Selected files deleted successfully</div></div>
<div id="toast3"><div id="img">Error</div><div id="desc">Error uploading file</div></div>
<div id="toast4"><div id="img">Info</div><div id="desc">Please select at least one file to delete</div></div>
<div id="toast5"><div id="img">Success</div><div id="desc">Successfully uploaded file</div></div>


<div class="container mt-5">

    <center>
        <div class="logo-container">
            <img src="logo.png" alt="" height="100px" width="100px" style="        margin-top: -30px ;
margin-right: 50px; margin-left: 50px; position: absolute;  border-radius: 10%;">
        </div>
    </center><br><br><br><br>
        <h2>Upload File</h2>
        <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="files">Choose files:</label>
                <input type="file" name="files[]" id="files" class="form-control" multiple>
            </div>
            <div class="form-group">
                <label for="note">Note:</label>
                <textarea name="note" id="note" class="form-control"></textarea>
            </div>
            <div id="fileListContainer"></div>
            <br>

            <button type="button" id="removeAllButton" class="btn btn-danger hidden">Remove All</button>
            <button type="submit" class="btn btn-primary" id="upload">Upload</button>
        </form>
        <div class="container">
            <h2 class="mt-5">Uploaded Files</h2>
            <p>Total files uploaded: <span id="fileCount">0</span></p>
            <div class="controls-container">
                <div>
                    <button type="button" id="selectAllButton" class="btn btn-secondary mb-3">Select All</button>
                    <button type="button" id="deleteSelectedButton" class="btn btn-danger mb-3 hidden">Delete
                        Selected</button>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="im" onchange="check_del();">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Show Delete Button</label>
                </div>
            </div>
            <ul id="fileList" class="list-group"></ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="scripts.js" defer></script>
    <script>
        function updateFileList() {
            $.ajax({
                url: 'fetch_files.php',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        $('#fileCount').text(data.file_count);
                        var fileListHtml = '';
                        for (var i = 0; i < data.files.length; i++) {
                            fileListHtml += '<li class="list-group-item">';
                            fileListHtml += '<div class="file-info">';
                            fileListHtml += '<span>' + data.files[i].filename + '</span>';
                            fileListHtml += '<p>Note: ' + data.files[i].note + '</p>';
                            fileListHtml += '<p>' + data.files[i].time + '</p>';
                            fileListHtml += '</div>';
                            fileListHtml += '<a href="download.php?filename=' + encodeURIComponent(data.files[i].filename) + '" download class="btn btn-success"><i class="fas fa-download"></i> Download</a>';
                            fileListHtml += '<input type="checkbox" id="hide" class="file-checkbox" data-file-id="' + data.files[i].id + '">';
                            fileListHtml += '</li>';
                        }
                        $('#fileList').html(fileListHtml);
                    } else {
                        alert('Error fetching files');
                    }
                },
                error: function (xhr, status, error) {
                    alert('Error fetching files');
                }
            });
        }
        const style = document.createElement('style');
style.innerHTML = `
      #hide {
      display:none;
      }
    `;
document.head.appendChild(style);
        function check_del() {
    var value = document.getElementById('im');

    if (value.checked) {
        // Checkbox is checked
        $('#selectAllButton').fadeIn();
        $('.file-checkbox').fadeIn();
        
        clearTimeout(timer); // Clear any existing timeout

    } else {

        // Stop long polling
        clearTimeout(timer); // Clear any existing timeout
        $('#selectAllButton').fadeOut();
        $('#deleteSelectedButton').fadeOut();
        $('#hide').fadeOut();

           // Start long polling
        longPolling();
    }
}

var timer; // Variable to store the timer ID

function longPolling() {
    updateFileList(); // Perform your long polling action here


    // Set timeout to call longPolling again after 5000ms (5 seconds)
    timer = setTimeout(longPolling, 5000);
}

    </script>
</body>

</html>