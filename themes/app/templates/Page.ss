<!DOCTYPE html>
<html lang="$ContentLocale">
<head>
	<% base_tag %>
	<title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	$MetaTags(false)

	<% require themedCSS("dist/css/app") %>

	<link rel="icon" type="image/png" href="/_resources/themes/app/dist/img/favicon/favicon-96x96.png?v=20260422" sizes="96x96" />
	<link rel="icon" type="image/svg+xml" href="/_resources/themes/app/dist/img/favicon/favicon.svg?v=20260422" />
	<link rel="shortcut icon" href="/_resources/themes/app/dist/img/favicon/favicon.ico?v=20260422" />
	<link rel="apple-touch-icon" sizes="180x180" href="/_resources/themes/app/dist/img/favicon/apple-touch-icon.png?v=20260422" />
	<link rel="manifest" href="/_resources/themes/app/dist/img/favicon/site.webmanifest?v=20260422" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<div class="nav-overlay" id="overlay"></div>

<div class="wrap">
	<div class="container">
		<main class="grid">
			<% include Header %>
			$Layout
		</main>
	</div>
</div>

<% include Footer %>

</body>
</html>