<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pandora's Kitchen</title>
    <style>
        .container {
            margin: 20px auto;
            display: flex;
        }
        #user-menu-container {
            width: 220px;
            min-width: 220px;
            max-width: 220px;
            margin-right: 20px;
            position: -webkit-sticky;
            position: sticky;
            top: 20px;
            background-color: #f0f0f0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            height: fit-content;
        }
        #user-menu-container h2 {
            margin-top: 0;
            font-size: 1.2em;
            text-align: center;
            margin-bottom: 10px;
        }
        .nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .nav li {
            margin-bottom: 5px;
        }
        .nav > li > a {
            display: block;
            width: 90%;
            margin: 0 auto;
            padding: 10px;
            text-decoration: none;
            color: #333;
            background-color: #ddd;
            border-radius: 4px;
        }
        .nav > li.active > a {
            font-weight: bold;
            background-color: #ccc;
        }
        .nav > li > a:hover {
            background-color: #bbb;
        }
        #content-container {
            flex-grow: 1;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .box {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            background: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left side menu -->
        <div id="user-menu-container">
            <h2>
                <a href="<?= Config::get('URL') . 'yourprofile'; ?>" class="menu-link">
                    <?= "User Profile"; ?>
                </a>
            </h2>
            <nav>
                <ul class="nav" id="side-menu">
                    <?php foreach ($this->menu_items as $item): ?>
                        <li><a href="<?= $item['url']; ?>" class="menu-link"><?= $item['label']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>

        <!-- Right side content container -->
        <div id="content-container">
            <!-- The default content will be loaded here via AJAX -->
        </div>
    </div>

    <!-- JavaScript for dynamic content loading -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Attach click event to all menu links
            document.querySelectorAll('.menu-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Remove active class from all menu items and add to the clicked one
                    document.querySelectorAll('#side-menu li').forEach(li => li.classList.remove('active'));
                    // If the link is inside a list item, add the active class
                    if (this.parentElement.tagName.toLowerCase() === 'li') {
                        this.parentElement.classList.add('active');
                    }

                    // Fetch and load the content from the link's href
                    fetch(this.getAttribute('href'))
                        .then(response => response.text())
                        .then(html => {
                            document.getElementById('content-container').innerHTML = html;
                        })
                        .catch(() => {
                            document.getElementById('content-container').innerHTML = "<p>Sorry, there was an error loading the content.</p>";
                        });
                });
            });

            // Simulate a click on the "User Profile" link so it loads by default
            const defaultLink = document.querySelector('#user-menu-container h2 a.menu-link');
            if (defaultLink) {
                defaultLink.click();
            }
        });
    </script>
</body>
</html>
