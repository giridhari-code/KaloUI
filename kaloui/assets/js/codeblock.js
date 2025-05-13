function copyCode() {
    const code = document.querySelector('.hljs code').innerText;
    navigator.clipboard.writeText(code).then(() => {
        alert('Code copied to clipboard!');
    }).catch(err => {
        alert('Failed to copy code: ' + err);
    });
}

document.addEventListener("DOMContentLoaded", function() {
    hljs.highlightAll();
});
