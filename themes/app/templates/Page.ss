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
<%--	<% require themedCSS("dist/css/form") %>--%>

    <link rel="icon" type="image/png" href="/assets/images/logos/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/assets/images/logos/favicon.svg" />
    <link rel="shortcut icon" href="/assets/images/logos/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/logos/apple-touch-icon.png" />
    <link rel="manifest" href="/assets/images/logos/site.webmanifest" />

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