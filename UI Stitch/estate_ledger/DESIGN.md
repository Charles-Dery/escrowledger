# Design System Specification: Editorial Real Estate Excellence

## 1. Overview & Creative North Star
**Creative North Star: "The Architectural Curator"**

This design system moves away from the cluttered, "utility-first" look of traditional CRM software. Instead, it draws inspiration from high-end architectural journals and luxury real estate editorials. We treat every data point, property listing, and financial figure as a curated piece of content. 

To break the "template" aesthetic, this system utilizes **Intentional Asymmetry** and **Tonal Depth**. We prioritize breathing room over information density, ensuring that the user feels a sense of calm and authority. The interface doesn't just manage data; it frames it. By using a high-contrast typography scale (pairing the geometric precision of *Manrope* with the functional clarity of *Inter*), we create a visual rhythm that guides the eye toward critical financial insights and premium property imagery.

---

## 2. Colors & Surface Architecture

### The Palette
The palette is rooted in `primary` (#002045), a deep, authoritative navy that anchors the experience. This is balanced by `secondary` (#006a68), a sophisticated teal that represents growth and liquidity.

### The "No-Line" Rule
**Borders are a design failure of the past.** In this system, we prohibit the use of 1px solid borders for sectioning. Structural boundaries must be defined exclusively through:
1.  **Background Shifts:** Use `surface-container-low` for a sidebar and `surface` for the main content.
2.  **Tonal Transitions:** A `surface-container-highest` header sitting atop a `surface-container-lowest` workspace.
3.  **Negative Space:** Using the Spacing Scale to create "invisible" gutters.

### Surface Hierarchy & Nesting
Treat the UI as a series of physical, stacked layers.
*   **Base:** `surface` (#f7fafc)
*   **Low-Level Sections:** `surface-container-low` (#f1f4f6)
*   **Active Workspaces:** `surface-container-lowest` (#ffffff)
*   **Elevated Details:** `surface-container-high` (#e5e9eb)

### The "Glass & Gradient" Rule
To inject "soul" into the professional environment:
*   **CTAs:** Use a subtle linear gradient from `primary` (#002045) to `primary_container` (#1a365d) at a 135-degree angle.
*   **Floating Navigation:** Utilize **Glassmorphism**. Apply `surface_container_lowest` at 80% opacity with a `24px` backdrop-blur. This allows property photos to bleed through the UI, creating an integrated, premium feel.

---

## 3. Typography
We use a dual-font strategy to balance editorial flair with high-performance utility.

*   **Display & Headlines (Manrope):** Chosen for its wide stance and modern geometric terminals. Use `display-lg` to `headline-sm` for property titles and high-level financial totals. It conveys "The Curator" voice—expensive, precise, and confident.
*   **Body & Labels (Inter):** The workhorse for data. Use `body-md` for descriptions and `label-sm` (often in `on_surface_variant`) for metadata. Inter’s high x-height ensures that complex financial tables remain legible even at smaller scales.

**Editorial Tip:** Use `letter-spacing: -0.02em` on `headline-lg` to give titles a "tight," custom-typeset appearance.

---

## 4. Elevation & Depth

### The Layering Principle
Forget shadows for basic organization. Achieve depth by **stacking tiers**. Place a `surface-container-lowest` card on a `surface-container-low` background. The slight shift in hex value creates a "soft lift" that is easier on the eyes during long work sessions than harsh drop shadows.

### Ambient Shadows
When an element must float (e.g., a property filter modal), use an **Ambient Shadow**:
*   **Blur:** 32px to 64px.
*   **Color:** `on_surface` (#181c1e) at **4% opacity**.
*   **Y-Offset:** 16px.
The goal is a soft glow of light, not a dark outline.

### The "Ghost Border" Fallback
If a border is required for accessibility (e.g., in a high-density table), use the `outline_variant` token at **15% opacity**. This creates a "Ghost Border" that suggests a boundary without interrupting the visual flow.

---

## 5. Components

### Cards (The "Property Portfolio" Style)
Forbid all divider lines.
*   **Background:** `surface-container-lowest`.
*   **Radius:** `xl` (0.75rem).
*   **Interaction:** On hover, shift background to `surface-container-high`. Do not use a "lift" animation; use a subtle color deepen.

### Financial Tables
*   **Header:** `surface-container-high` with `label-md` uppercase text.
*   **Row Separation:** No lines. Use alternating row colors (`surface` and `surface-container-low`) or 24px vertical padding between entries.
*   **Key Figures:** Use `secondary` (#006a68) for positive growth trends to signal "Reliability."

### Primary Buttons
*   **Style:** `primary` gradient fill.
*   **Typography:** `title-sm` (Inter), medium weight.
*   **Rounding:** `full` (9999px) to contrast against the sharp, architectural lines of the layout.

### Input Fields
*   **State:** Unfocused inputs use `surface-container-highest` background with no border.
*   **Focus State:** A 2px "Ghost Border" using `primary` at 40% and a subtle `surface-tint` glow.

---

## 6. Do’s and Don’ts

### Do:
*   **Do** use asymmetrical spacing. A wider left margin on a property detail page creates an "editorial" look.
*   **Do** use `on_surface_variant` (#43474e) for secondary text to maintain a soft, low-fatigue contrast ratio.
*   **Do** let high-quality property imagery take up at least 40% of the viewport on listing pages.

### Don't:
*   **Don't** use 100% black text. Always use `on_surface` (#181c1e).
*   **Don't** use "Standard Blue" for links. Use `secondary` (#006a68) to maintain the teal/sage accent theme.
*   **Don't** use card borders. If the card isn't visible against the background, your background `surface` token is likely incorrect.
*   **Don't** use "Default" shadows. If the shadow looks like a shadow, it’s too dark. It should look like "Depth."