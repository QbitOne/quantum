Quantum hat alles 6 Headings definiert und nutzt für die `font-size` die `clamp()` Funktion.<br><br>
**clamp()**<br>
`clamp(min, default, max)` <br>

Alle Headings haben by default `margin:0` sowie `font-weight: 300`

```
h1 {
  /* 40px */
  /* font-size: 4rem; */
  font-size: clamp(3.6rem, 3.8vw, 4rem);
}
h2 {
  /* 32px */
  /* font-size: 3.2rem; */
  font-size: clamp(2.8rem, 3vw, 3.2rem);
}
h3 {
  /* 26px */
  /* font-size: 2.6rem; */
  font-size: clamp(2.2rem, 2.4vw, 4rem);
}
h4 {
  /* 22px */
  /* font-size: 2.2rem; */
  font-size: clamp(1.8rem, 2vw, 4rem);
}
h5 {
  /* 20px */
  /* font-size: 2rem; */
  font-size: clamp(1.6rem, 1.8vw, 4rem);
}
h6 {
  /* 20px */
  /* font-size: 2rem; */
  font-size: clamp(1.6rem, 1.8vw, 4rem);
}
```
