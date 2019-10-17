		(() => {
			let nav_logout = document.querySelector('.nav_logout');
			let admin_icon = document.querySelector('.admin_icon');
			let admin_icon_menu = document.querySelector('.admin_icon_menu');
			admin_icon.addEventListener('click', () => {	
				admin_icon_menu.classList.toggle('show');
			});
			window.addEventListener('click', (e) => {
				if (!nav_logout.contains(e.target) && admin_icon_menu.classList.contains("show")) {
					admin_icon_menu.classList.toggle('show');
				} 
			});
		})();