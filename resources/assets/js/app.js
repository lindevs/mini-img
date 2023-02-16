import 'dropzone';
import { filesize } from  'filesize';

const uploadForm = document.getElementById('upload-form');
const filesTable = document.getElementById('files-table');

const dropzone = new Dropzone(uploadForm, {
    previewsContainer: false,
    parallelUploads: 10,
});

dropzone.on('dragover', () => {
    uploadForm.classList.add('hover');
});
dropzone.on('dragleave', () => {
    uploadForm.classList.remove('hover');
});
dropzone.on('drop', () => {
    uploadForm.classList.remove('hover');
});

dropzone.on('sending', file => {
    const row = filesTable.insertRow();
    row.id = file.upload.uuid;

    let cell = row.insertCell();
    cell.appendChild(document.createTextNode(file.name));

    const size = formatFileSize(file.size);
    cell = row.insertCell();
    cell.appendChild(document.createTextNode(size));

    cell = row.insertCell();
    const progressBar = document.createElement('div');
    progressBar.classList.add('progress', 'progress-bar', 'progress-bar-striped', 'progress-bar-animated');
    cell.appendChild(progressBar);

    row.insertCell();
    row.insertCell();
    row.insertCell();
});

dropzone.on('success', (file, response) => {
    const row = document.getElementById(file.upload.uuid);

    const progressBar = row.cells[2].firstChild;
    progressBar.classList.remove('progress-bar-striped', 'progress-bar-animated');
    progressBar.classList.add('bg-success');

    const size = formatFileSize(response['compressed_file_size']);
    row.cells[3].appendChild(document.createTextNode(size));

    const downloadLink = document.createElement('a');
    downloadLink.text = 'Download';
    downloadLink.href = response['url'];
    downloadLink.setAttribute('download', '')
    row.cells[4].appendChild(downloadLink);

    row.cells[5].appendChild(document.createTextNode(response['percentage'] + '%'));
});

dropzone.on('error', (file, errorMessage, xhr) => {
    const response = JSON.parse(xhr.responseText);
    const message = response['message'];

    const row = document.getElementById(file.upload.uuid);

    const progressBar = row.cells[2].firstChild;
    progressBar.classList.remove('progress-bar-striped', 'progress-bar-animated');
    progressBar.classList.add('bg-danger');

    row.cells[3].appendChild(document.createTextNode(message));
    row.cells[3].colSpan = 3;

    row.deleteCell(-1);
    row.deleteCell(-1);
});

function formatFileSize(size)
{
    return filesize(size, {base: 2});
}
