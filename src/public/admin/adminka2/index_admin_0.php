<?php
session_start();

// Initialize breadcrumb array if not set
if (!isset($_SESSION['breadcrumbs'])) {
    $_SESSION['breadcrumbs'] = ['Home'];
}

// Handle form submission to add new breadcrumb
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['breadcrumb'])) {
    $new_breadcrumb = trim($_POST['breadcrumb']);
    if ($new_breadcrumb !== '') {
        $_SESSION['breadcrumbs'][] = htmlspecialchars($new_breadcrumb);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Breadcrumb Menu</title>
<style>
  .breadcrumb {
    list-style: none;
    display: flex;
  }
  .breadcrumb li {
    margin-right: 8px;
  }
  .breadcrumb li+li:before {
    content: ">";
    margin-right: 8px;
  }
</style>
</head>
<body>

<h2>Breadcrumb Navigation</h2>

<!-- Breadcrumb Display -->
<ul class="breadcrumb" id="breadcrumb">
  <?php
  foreach ($_SESSION['breadcrumbs'] as $index => $crumb) {
      if ($index == count($_SESSION['breadcrumbs']) -1) {
          echo "<li>$crumb</li>";
      } else {
          echo "<li><a href=\"#\" data-index=\"$index\">$crumb</a></li>";
      }
  }
  ?>
</ul>

<!-- Input form to add new breadcrumb -->
<form method="POST" id="breadcrumbForm">
  <input type="text" name="breadcrumb" placeholder="Add breadcrumb" required />
  <button type="submit">Add</button>
</form>

<!-- JavaScript for interactivity -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const breadcrumbContainer = document.getElementById('breadcrumb');

    breadcrumbContainer.addEventListener('click', (e) => {
      if (e.target.tagName === 'A') {
        e.preventDefault();
        const index = parseInt(e.target.getAttribute('data-index'));
        // Remove breadcrumbs after clicked index
        fetch('update_breadcrumbs.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ index: index })
        }).then(response => response.json())
          .then(data => {
            // Reload page to update breadcrumb trail
            location.reload();
          });
      }
    });
  });
</script>

</body>
</html>