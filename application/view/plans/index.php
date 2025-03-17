<div>
    <h1>Plans</h1>
    <div>

        <?php $this->renderFeedbackMessages(); ?>

        <h3>Plans</h3>
        <div>
            <?php if (!empty($this->plans)) : ?>
                <ul>
                    <?php foreach ($this->plans as $plan) : ?>
                        <li>
                            <?= htmlspecialchars($plan->id); ?>
                            <a href="#" class="delete-link" data-id="<?= $plan->id; ?>" style="text-decoration: underline; color: blue; cursor: pointer;">
                                Delete
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <form id="delete-form" action="<?= Config::get('URL'); ?>plans/deleteFavorite" method="post" style="display:none;">
                    <input type="hidden" name="plan_id" id="delete-plan-id">
                </form>
            <?php else : ?>
                <p>No meal plans found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".delete-link").forEach(function (link) {
            link.addEventListener("click", function (event) {
                event.preventDefault();
                if (confirm("Are you sure?")) {
                    document.getElementById("delete-plan-id").value = this.getAttribute("data-id");
                    document.getElementById("delete-form").submit();
                }
            });
        });
    });
</script>
