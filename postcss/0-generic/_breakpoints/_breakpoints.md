Quantum nutzt 4 vordefinierte Breakpoints, welche als Mixin innerhalb PostCSS eingesetzt werden können.<br>
Inspiriert von [TailwindCSS Breakpoints](https://tailwindcss.com/docs/breakpoints)

**Zu beachten:**<br>
**Diese Breakpoints sind nur für das Quantum Theme nutzbar.**<br>
Da sie als `mixin` innerhalb `postcss` verwendet werden, sind sie nicht für das Projekttheme anwendbar.<br>
Es muss innerhalb des Projekttheme ebenfalls die `\_breakpoints.css` angelegt werden.<br>

```
@define-mixin atSmall {
  @media (min-width: 640px) {
    @mixin-content;
  }
}

@define-mixin atMedium {
  @media (min-width: 768px) {
    @mixin-content;
  }
}

@define-mixin atLarge {
  @media (min-width: 1024px) {
    @mixin-content;
  }
}

@define-mixin atExtraLarge {
  @media (min-width: 1280px) {
    @mixin-content;
  }
}
```
