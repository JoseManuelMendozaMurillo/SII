document.addEventListener('DOMContentLoaded', function () {
	const btnOpenModalDelete = document.querySelectorAll('.btnOpenModalDelete');
	const modalDelete = new bootstrap.Modal(
		document.getElementById('modalDelete'),
	);

	btnOpenModalDelete.forEach((btn) => {
		btn.addEventListener('click', (event) => {
			const idAlumnoDelete = event.target.getAttribute('data-id');
			const nameAlumnoDelete = document.getElementById(
				`nameAlumno${idAlumnoDelete}`,
			).textContent;
			openModalDelete(idAlumnoDelete, nameAlumnoDelete);
		});
	});

	function openModalDelete(idAlumnoDelete, nameAlumnoDelete) {
		const nameAlumno = document.getElementById('nameAlumno');
		const btnDeleteAlumno = document.getElementById('btnDeleteAlumno');
		nameAlumno.textContent = nameAlumnoDelete;
		btnDeleteAlumno.setAttribute(
			'href',
			`${url}alumno/delete/${idAlumnoDelete}`,
		);
		modalDelete.show();
	}
});
