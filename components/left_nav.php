		<nav class="nav_menu_left container col-md-2">
			<ul class="left_menu">
				<li class="first">		
					<a class="link" href="./index.php"><i class="fas fa-table"></i><span class="a-txt">Dashboard</span></a>
				</li>
				<li class="submenu_toggler">
					<a class="link sub" href="#"><i class="fas fa-car-alt"></i><span class='a-txt'>Vehicle Category</span><i class="fas fa-chevron-right arrow"></i></a>
					<ul class="submenu">
						<li class="submenu_li">		
							<a class="submenu_a link" href="./add_vehicle_category.php"><i class="fas fa-plus-square"></i><span class="a-txt">Add Category</span></a>
						</li>
						<li class="submenu_li">			
							<a class="submenu_a link" href="./manage_vehicle_category.php"><i class="fas fa-th-list"></i><span class="a-txt">Manage Category</span></a>
						</li>
					</ul>
				</li>
				<li>
					<a class="link" href="./add_vehicle.php"><i class="fas fa-plus-square"></i><span class="a-txt">Add Vehicle</span></a>
				</li>
				<li class="submenu_toggler">
					<a class="link sub" href="#"><i class="fas fa-tasks"></i><span class="a-txt">Manage Vehicle</<span><i class="fas fa-chevron-right arrow"></i></a>
					<ul class="submenu">
						<li class="submenu_li">	
							<a class="submenu_a link" href="./manage_vehicle.php"><i class="fas fa-list-alt"></i><span class="a-txt">Manage Vehicle</span></a>
						</li>
						<li class="submenu_li">
							<a class="submenu_a link" href="./manage_out_vehicle.php"><i class="fas fa-list-ul"></i><span class="a-txt">Manage Out Vehicle</span></a>
						</li>
					</ul>
				</li>
				<li>		
					<a class="link" href="./reports.php"><i class="fas fa-exclamation-circle"></i><span class="a-txt">Reports</span></a>
				</li>
				<li>			
					<a class="link" href="./search_vehicle.php"><i class="fas fa-search"></i><span class="a-txt">Search Vehicle</span></a>
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

				const active_link = () => {
					let path = window.location.pathname;
					path = path.replace(/\/$/, "");
					path = decodeURIComponent(path);
					path = path.slice(16);
					path = path.replace(/\./g, "");
					$('.link').each(function() {
						let href = $(this).attr('href');
						href = href.replace(/\./g, "");
						if (path.substring(0, path.length) === href) {
							$(this).closest('a').addClass('active');
						}
					});
				}

				active_link();
			})();
		</script>