const msgStatus = document.querySelector('.msg-status')

console.log(document.location.search)

if (document.location.search === '?mail_status=sent') {
	msgStatus.classList.add('success')
	msgStatus.textContent = 'Wiadomość wysłana!'

	setTimeout(() => {
		msgStatus.classList.remove('success')
	}, 3000)
}

if (document.location.search === '?mail_status=error') {
	msgStatus.classList.add('error')
	msgStatus.textContent = 'Wystąpił błąd'

	setTimeout(() => {
		msgStatus.classList.remove('error')
	}, 3000)
}
