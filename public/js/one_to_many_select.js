document.addEventListener('DOMContentLoaded', function () {
    // Event listener for selecting an owner
    document.querySelectorAll('.select-owner').forEach(button => {
        button.addEventListener('click', function () {
            const ownerId = this.getAttribute('data-owner-id');
            const ownerName = this.getAttribute('data-owner-name');

            // Set the value of the owner field
            document.querySelector('input[name="owner"]').value = ownerName;

            // Close the modal
            $('#SelectOwner').modal('hide');
        });
    });
});
