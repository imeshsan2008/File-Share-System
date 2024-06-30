$(document).ready(function() {
    // Function to update the file list
   

    function createFileItem(file) {
        return 
        `    <div class="file-item">
                <div class="file-name">${file.name}</div>
                <div class="progress hidden">
                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-file">Remove</button>
            </div>;`
    }
    function launch_toast() {
        var x = document.getElementById("toast")
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
    }
    
    function launch_toast2() {
        var x = document.getElementById("toast2")
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
        setTimeout(function(){ location.reload(); }, 5000);
    }  function launch_toast3() {
        var x = document.getElementById("toast3")
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
    } function launch_toast4() {
        var x = document.getElementById("toast4")
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
    }
    function launch_toast5() {
        var x = document.getElementById("toast5")
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
    }
    function handleFileSelect(e) {
        var files = e.target.files;
        var fileListContainer = $('#fileListContainer');
        fileListContainer.html('');
        for (var i = 0; i < files.length; i++) {
            fileListContainer.append(createFileItem(files[i]));
        }
        if (files.length > 0) {
            $('#removeAllButton').removeClass('hidden');
        } else {
            $('#removeAllButton').addClass('hidden');
        }
    }

    $('#files').change(handleFileSelect);

    $('#fileListContainer').on('click', '.remove-file', function() {
        $(this).closest('.file-item').remove();
        if ($('#fileListContainer').children().length === 0) {
            $('#removeAllButton').addClass('hidden');
        }
    });

    $('#removeAllButton').click(function() {
        $('#fileListContainer').html('');
        $('#files').val('');
        $(this).addClass('hidden');
    });

    $('#uploadForm').submit(function(e) {
        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');
        var formData = new FormData(form[0]);

        var files = $('#files')[0].files;
        if (files.length === 0) {
            launch_toast();
                        return;
        }

        for (var i = 0; i < files.length; i++) {
            formData.append('files[]', files[i]);
        }

        $('.progress').removeClass('hidden');

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            xhr: function() {
                var xhr = new XMLHttpRequest();
                xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                        var percentComplete = Math.round((e.loaded / e.total) * 100);
                        $('.progress-bar').css('width', percentComplete + '%').attr('aria-valuenow', percentComplete);
                    }
                }, false);
                return xhr;
            },
            success: function(response) {
                if (response.success) {
                    launch_toast5();
                    updateFileList();
                    $('#fileListContainer').html('');
                    $('#files').val('');
                    $('#note').val('');  // Clear the note textarea
                    $('.progress-bar').css('width', '0%').attr('aria-valuenow', '0');
                    $('#removeAllButton').addClass('hidden');
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                alert('Error uploading file.');
            }
        });
    });
   




    // function longPolling() {
    //     setTimeout(function() {
    //         updateFileList();
    //         longPolling();
    //     }, 5000);
    // }

     
   
    $('#selectAllButton').click(function() {
   
        var isChecked = $(this).data('checked') || false;
        $('.file-checkbox').prop('checked', !isChecked);
        $(this).data('checked', !isChecked);
       
        $('#deleteSelectedButton').toggleClass('hidden', $('.file-checkbox:checked').length === 0);

    });

    $('#fileList').on('change', '.file-checkbox', function() {
        var anyChecked = $('.file-checkbox:checked').length > 0;
        $('#deleteSelectedButton').toggleClass('hidden', !anyChecked);
    });

    $('#deleteSelectedButton').click(function() {
        var selectedFiles = $('.file-checkbox:checked').map(function() {
            return $(this).data('file-id');
        }).get();

        if (selectedFiles.length === 0) {
            launch_toast4();
            return;
        }

        console.log('Selected files for deletion:', selectedFiles);

        $.ajax({
            type: 'POST',
            url: 'delete_files.php',
            data: { file_ids: selectedFiles },
            dataType: 'json',
            success: function(response) {
                console.log('Delete response:', response);
                if (response.success) {
                    launch_toast2();
                                       
                    $('#deleteSelectedButton').addClass('hidden');
                    $('#selectAllButton').data('checked', false);
                    $('#deleteSelectedButton').fadeOut();
                    $('#selectAllButton').fadeOut();
                    $('.file-checkbox').fadeOut();
                } else {
                    alert('Error deleting files: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', xhr, status, error);
                launch_toast();
            }
        });
    });
});