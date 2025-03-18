<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pandora's Kitchen</title>
</head>
<body>
    <div class="user-options-container">
        <!-- Left side menu -->
        <div id="user-menu-container">
            <h2>
                <a href="<?= Config::get('URL') . 'yourprofile'; ?>" class="menu-link" data-label="User Profile">
                    <?= "User Profile"; ?>
                </a>
            </h2>
            <nav>
                <ul class="nav-user" id="side-menu">
                    <?php foreach ($this->menu_items as $item): ?>
                        <li>
                            <a href="<?= $item['url']; ?>" class="menu-link" data-label="<?= $item['label']; ?>" data-active="<?= $item['active']; ?>">
                                <?= $item['label']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>

        <!-- Right side content container -->
        <div id="content-container">
            <!-- The default content will be loaded here -->
        </div>
    </div>

    <!-- JavaScript for dynamic content loading -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Attach click events to all menu links
            document.querySelectorAll('.menu-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Immediately replace the content with a loading spinner
                    const contentContainer = document.getElementById('content-container');
                    contentContainer.innerHTML = '<div class="loading-spinner"></div>';

                    // Check if the link is the "User Profile" link
                    const isUserProfile = this.getAttribute('data-label') === 'User Profile';

                    // Handle active parameter for menu links
                    if (!isUserProfile) {
                        // Append the active parameter for all menu items except "User Profile"
                        const active = this.getAttribute('data-active');
                        const currentUrl = new URL(window.location);
                        currentUrl.searchParams.set('active', active.toLowerCase());
                        window.history.pushState({}, '', currentUrl); // Update the URL without reloading the page
                    } else {
                        // For "User Profile", ensure no active query parameter
                        const currentUrl = new URL(window.location);
                        currentUrl.searchParams.delete('active');
                        window.history.pushState({}, '', currentUrl); // Update the URL without reloading the page
                    }

                    // Remove active class from all menu items and add to the clicked one
                    document.querySelectorAll('#side-menu li').forEach(li => li.classList.remove('active'));
                    if (this.parentElement.tagName.toLowerCase() === 'li') {
                        this.parentElement.classList.add('active');
                    }

                    // Fetch and load the content from the link's href
                    fetch(this.getAttribute('href'))
                        .then(response => response.text())
                        .then(html => {
                            // Update the content container with the fetched content
                            contentContainer.innerHTML = html;
                        })
                        .catch(() => {
                            // Show an error message if the fetch fails
                            contentContainer.innerHTML = "<p>Sorry, there was an error loading the content.</p>";
                        });
                });
            });

            // Check for an active menu query parameter in the URL
            const params = new URLSearchParams(window.location.search);
            let activeMenu = params.get('active');
            let defaultLink;

            // If no active menu or it's empty, load "User Profile"
            if (!activeMenu) {
                defaultLink = document.querySelector('#user-menu-container h2 a.menu-link');
            } else {
                // Otherwise, find the menu link that matches the active parameter
                defaultLink = document.querySelector(`.menu-link[data-active="${activeMenu}"]`);
            }

            if (defaultLink) {
                defaultLink.click();
            }
        });
    </script>
</body>
</html>