<section class="w-2/6 ml-12 relative">
    <div class="sticky top-16 left-0 right-0">
        <h6 class="text-3xl mb-2 font-bold">Sommaire</h6>
        <ul class="hover:[&>li]:underline" id="summary"></ul>
        <script>
            for (const summary of document.getElementById("{{ $id }}").children) {
                if (
                        summary.tagName.toLowerCase().includes("h1") ||
                        summary.tagName.toLowerCase().includes("h2") ||
                        summary.tagName.toLowerCase().includes("h3")
                ) {
                    const a = document.createElement('a');

                    a.href = `#${summary.id}`
                    a.innerText = summary.childNodes[0].nodeValue;

                    const li = document.createElement('li');
                    li.appendChild(a);

                    document.querySelector('#summary').appendChild(li);
                }
            }
        </script>
    </div>
</section>