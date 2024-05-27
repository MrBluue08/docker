document.addEventListener('DOMContentLoaded', function () {
    var enterTeamIcons = document.querySelectorAll('#enterTeamIcon');

    enterTeamIcons.forEach(function (icon) {
        icon.addEventListener('click', function () {
            var teamId = this.closest('tr').querySelector('#teamId').textContent;
            var teamName = this.closest('tr').querySelector('#teamName').textContent;
            var modalBody = document.querySelector('.modal-body');
            var hiddenInput = document.querySelector('input[name="teamId"]');
            modalBody.textContent = "Está a punto de unirse al equipo " + teamName + ". ¿Está seguro?";
            hiddenInput.value = teamId;
        });
    });
});
