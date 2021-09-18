Es sind zwei Breakpoints definiert.

-   800px
-   1200px

**Zu beachten:**<br>
**Diese Breakpoints sind momentan nur für das Quantum Theme nutzbar.**<br>
Da sie als `mixin` innerhalb `postcss` verwendet werden, sind sie nicht für das Projekttheme anwendbar.<br>
Dafür muss momentan innerhalb des Projekttheme ebenfalls die `\_breakpoints.css` angelegt werden.<br>

```
@define-mixin atSmall {
	@media (min-width: 800px) {
		@mixin-content;
	}
}

@define-mixin atMedium {
	@media (min-width: 1200px) {
		@mixin-content;
	}
}
```
