		<nav class="nav_menu_left container col-md-2">
			<ul class="left_menu">
				<li class="active first">
					<i class="fas fa-table"></i>
					<a href="./index.php">Dashboard</a>
				</li>
				<li class="submenu_toggler">
					<i class="fas fa-car-alt"></i>
					<a href="#">Vehicle Category</a>
					<i class="fas fa-chevron-right arrow"></i>
					<ul class="submenu">
						<li><a href="./add_vehicle_category.php">Add Category</a></li>
						<li><a href="#">Manage Category</a></li>
					</ul>
				</li>
				<li>
					<i class="fas fa-plus-square"></i>
					<a href="#">Add Vehicle</a>
				</li>
				<li class="submenu_toggler">
					<i class="fas fa-tasks"></i>
					<a href="#">Manage Vehicle</a>
					<i class="fas fa-chevron-right arrow"></i>
					<ul class="submenu">
						<li><a href="#">Add Category</a></li>
						<li><a href="#">Manage Category</a></li>
					</ul>
				</li>
				<li class="submenu_toggler">
					<i class="fas fa-exclamation-circle"></i>
					<a href="#">Reports</a>
					<i class="fas fa-chevron-right arrow"></i>
					<ul class="submenu">
						<li><a href="#">Report vehicle</a></li>
						<li><a href="#">Manage Category</a></li>
					</ul>
				</li>
				<li>
					<i class="fas fa-search"></i>
					<a href="#">Search Vehicle</a>
				</li>
			</ul>
		</nav>

		<script>
		(() => {
			const submenu_toggler = document.querySelectorAll('.submenu_toggler');
			const submenus = document.querySelectorAll('.submenu');
			const arrows = document.querySelectorAll('.arrow');
					
			const show_submenu = i => {
				submenus[i].classList.toggle('open_submenu');
				arrows[i].classList.toggle('arrow_rotate');
			}

			[].forEach.call(submenu_toggler, (submenu, index) => {
				submenu.addEventListener('click', () => show_submenu(index));
			});
		})();
		</script>