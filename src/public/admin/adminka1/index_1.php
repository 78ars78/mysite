<?php
// Sample initial breadcrumbs array
$breadcrumbs = [
    ['name' => 'Home', 'url' => 'index.php'],
    ['name' => 'Products', 'url' => 'products.php'],
    ['name' => 'Electronics', 'url' => 'electronics.php'],
    ['name' => 'Electr', 'url' => 'electr.php'] 
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>PHP JS Breadcrumbs</title>
<style>
.breadcrumb {
    list-style: none;
    display: flex;
}
.breadcrumb li {
    margin-right: 8px;
}
.breadcrumb li a {
    text-decoration: none;
    color: blue;
}
</style>
</head>
<body>

<h2>Breadcrumbs</h2>
<ul class="breadcrumb" id="breadcrumb">
    <?php foreach ($breadcrumbs as $index => $crumb): ?>
        <li>
            <a href="<?= $crumb['url'] ?>"><?= $crumb['name'] ?></a>
            <?php if ($index < count($breadcrumbs) - 1): ?>
                &gt;
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>

<h3>Add Breadcrumb</h3>
<input type="text" id="breadcrumbName" placeholder="Name" />
<input type="text" id="breadcrumbUrl" placeholder="URL" />
<button onclick="addBreadcrumb()">Add</button>

<script>
// JavaScript to handle dynamic addition
function addBreadcrumb() {
    const name = document.getElementById('breadcrumbName').value.trim();
    const url = document.getElementById('breadcrumbUrl').value.trim();
    if (name && url) {
        const breadcrumbUl = document.getElementById('breadcrumb');

        const li = document.createElement('li');
        const a = document.createElement('a');
        a.href = url;
        a.textContent = name;
        li.appendChild(a);

        // Add separator if not the last item
        if (breadcrumbUl.children.length > 0) {
            const separator = document.createTextNode(' > ');
            breadcrumbUl.appendChild(separator);
        }
        breadcrumbUl.appendChild(li);

        // Clear inputs
        document.getElementById('breadcrumbName').value = '';
        document.getElementById('breadcrumbUrl').value = '';
    } else {
        alert('Please enter both name and URL');
    }
}
</script>

</body>
</html>