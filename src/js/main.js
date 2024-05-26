const burgerBtn = document.querySelector('.burgerBtn')
const navItems = document.querySelector('.nav__items-mobile')
const scrollBox = document.querySelector('.scroll-up')
const info1 = document.querySelector('.info1')
const info2 = document.querySelector('.info2')
const year = document.querySelector('.year')
const menuSection = document.querySelectorAll('.menu-section')
const menuTab = document.querySelectorAll('.menu-tab')
const msgStatus = document.querySelector('.msgStatus')

if (document.location.search === '?product=added') {
	msgStatus.classList.add('showMsg')
	msgStatus.textContent = 'Produkt Dodany'

	setTimeout(() => {
		msgStatus.classList.remove('showMsg')
	}, 3000)
}

if (document.location.search === '?product=deleted') {
	msgStatus.classList.add('showMsg')
	msgStatus.textContent = 'Produkt Usunięty'

	setTimeout(() => {
		msgStatus.classList.remove('showMsg')
	}, 3000)
}

const showInfo = id => {
	menuSection.forEach(section => {
		section.style.display = 'none'
	})
	menuTab.forEach(tab => {
		tab.classList.remove('menu-tab--active')
	})
	document.getElementById(id).style.display = 'block'
	const currentBtn = document.querySelector(`[data-id=${id}]`)
	currentBtn.classList.add('menu-tab--active')
}

const showMobile = () => {
	navItems.classList.toggle('show-menu')
}

const showScrollBox = () => {
	if (window.scrollY > 100) {
		scrollBox.classList.add('show-scrollBox')
	} else {
		scrollBox.classList.remove('show-scrollBox')
	}
}

setInterval(() => {
	if (info1.classList.contains('hide')) {
		info1.classList.remove('hide')
		info2.classList.add('hide')
	} else {
		info1.classList.add('hide')
		info2.classList.remove('hide')
	}
}, 6000)

const setYear = () => {
	const currentDate = new Date()
	const currentYear = currentDate.getFullYear()
	year.textContent = currentYear
}

burgerBtn.addEventListener('click', showMobile)
window.addEventListener('scroll', showScrollBox)
scrollBox.addEventListener('click', () => window.scrollTo({ top: 0 }))
setYear()
