<x-app-layout>
    <x-slot name="header">
        <h2 class="h2_title">
            {{ __('About') }}
        </h2>
    </x-slot>

    <div class="container_body">
        <div class="container_main">
            <div class="border">
                <div class="border_text">
                    <h3>About Us</h3>
                    <p>
                        In this project i just made the products by the API link for each product, You could add a product (or a game) in your Library, just like <strong>Steam</strong>.
                    </p>
                    <br>
                    <h3>Resources Used:</h3><br>
                    <ul>
                        <li>
                            Resource 1 - <a href="https://rawg.io/apidocs" target="_blank">The website <strong>Rawg.io</strong> to get the API link </a>
                        </li>
                        <br>
                        <li>
                            Resource 2 - <a href="https://api.rawg.io/api/games?key=5af1cfd2f6004e0698ee9fc217dd31fc&dates=2019-09-01,2019-09-30&platforms=18,1,7" target="_blank">The API itselfs</a>
                        </li>
                        <!-- Add more resources here -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
