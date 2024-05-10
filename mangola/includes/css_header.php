<head>
	<title>Strawberry Heaven | The home of Strawberries</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<script>
		document.addEventListener('DOMContentLoaded', (event) => {
			let currentPage = window.location.pathname;
			let links = document.querySelectorAll('nav ul li a');
			links.forEach(link => {
				if (link.href.includes(currentPage)) {
					link.classList.add('active');
					var parentNodeLi = link.closest('ul').closest('li');
					if (parentNodeLi && parentNodeLi !== link.parentNode) {
						// 找到了匹配的元素，但不是当前元素本身
						parentNodeLi.querySelector("a").classList.add('active');

					}

				}
			});
		});
	</script>
</head>