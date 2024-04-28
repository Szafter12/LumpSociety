const burgerBtn = document.querySelector('.burgerBtn')
const navItems = document.querySelector('.nav__items-mobile')
const scrollBox = document.querySelector('.scroll-up')
const info1 = document.querySelector('.info1')
const info2 = document.querySelector('.info2')
const year = document.querySelector('.year')
const cartBtn = document.querySelector('.cart-btn')
const closeCartBtn = document.querySelector('.close-btn')
const cart = document.querySelector('.cart')

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

const showCart = () => {
	cart.classList.add('show-cart')
}

const closeCart = () => {
	cart.classList.remove('show-cart')
}

burgerBtn.addEventListener('click', showMobile)
window.addEventListener('scroll', showScrollBox)
scrollBox.addEventListener('click', () => window.scrollTo({ top: 0 }))
cartBtn.addEventListener('click', showCart)
closeCartBtn.addEventListener('click', closeCart)
setYear()
