<?php

/**
 * The template for displaying a sample pages for dev
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Quantum
 */

get_header();
?>

<div class="qu-container">
	<div class="qu-flex qu-flex-grid cols-2">
		<div class="qu-flex-grid__item">
			<h2>Hello world</h2>
			<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At or invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
		</div>
		<div class="qu-flex-grid__item">
			<h2>Hello world</h2>
			<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>
		</div>
		<div class="qu-flex-grid__item">
			<h2>Hello world</h2>
			<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit ameadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
		</div>
		<div class="qu-flex-grid__item">
			<h2>Hello world</h2>
			<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusa rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
		</div>
		<div class="qu-flex-grid__item">
			<h2>Hello world</h2>
			<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit ameadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
		</div>
		<div class="qu-flex-grid__item">
			<h2>Hello world</h2>
			<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusa rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
		</div>
	</div>
	<div>
		<h2>Lists</h2>
		<div class="qu-flex justify--between">
			<div>
				<h3>Unordered List</h3>
				<ul>
					<li>List Item 1</li>
					<li>List Item 2</li>
					<li>List Item 3</li>
					<li>List Item 4</li>
					<li>List Item 5</li>
					<li>List Item 6</li>
				</ul>
			</div>
			<div>
				<h3>Ordered List</h3>
				<ol>
					<li>List Item 1</li>
					<li>List Item 2</li>
					<li>List Item 3</li>
					<li>List Item 4</li>
					<li>List Item 5</li>
					<li>List Item 6</li>
				</ol>
			</div>
			<div>
				<h3>Definition List</h3>
				<dl>
					<dt>Hypertext</dt>
					<dd>A system of text pages that have cross-references.</dd>
					<dt>Hyperlink</dt>
					<dd>A part of a hypertext document that references another item.</dd>
					<dt>HTML</dt>
					<dd>Hypertext Markup Language</dd>
				</dl>
			</div>
		</div>
	</div>
	<div>
		<h2>Images</h2>
		<div class="qu-flex justify--between">
			<div>
				<img src="https://picsum.photos/1920/1080" alt="">
			</div>
			<div>
				<figure>
					<img src="https://picsum.photos/960/540" alt="">
					<figcaption>Example figure caption</figcaption>
				</figure>
			</div>
			<div>
				<picture>
					<source srcset="https://picsum.photos/1920/1080" media="(min-width: 1450px)">
					<source srcset="https://picsum.photos/960/540" media="(min-width: 1000px)">
					<img src="https://picsum.photos/640/360" alt="">
				</picture>
			</div>
		</div>
	</div>
	<div>
		<h2>Table</h2>
		<table>
			<thead>
				<tr>
					<th>Type of Food</th>
					<th>Calories</th>
					<th>Tasty Factor</th>
					<th>Average Price</th>
					<th>Rarity</th>
					<th>Average Rating</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Slice of Pizza</td>
					<td>450</td>
					<td>95%</td>
					<td>$5.00</td>
					<td>Common</td>
					<td>8/10</td>
				</tr>
				<tr>
					<td>Hamburger</td>
					<td>350</td>
					<td>87%</td>
					<td>$3.50</td>
					<td>Common</td>
					<td>7.5/10</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
</div>
<?php
get_footer();
