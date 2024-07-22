document.getElementById('studentForm').addEventListener('submit', function (e) {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const age = document.getElementById('age').value;

    if (!name || !email || !age) {
        alert('Please fill out all fields.');
        e.preventDefault();
    }
});
