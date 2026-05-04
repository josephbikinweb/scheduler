function showDeleteModal(message, actionUrl) {
    // set message
    document.getElementById('deleteModalMessage').innerText = message;

    // set form action
    document.getElementById('deleteForm').action = actionUrl;

    // tampilkan modal
    const modal = document.getElementById('deleteModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
