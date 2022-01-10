# Site options and customizer

## Customizer

Customizer is a great way to dealing with WordPress theme options but it is quite a bit of work to do to register and apply it. Fortunately Brocooly uses the power of [Kirki Framework](https://kirki.org) to build quick and extended theme options. 

### Configuration

Configuration file for customizer is located at `config/customizer.php` file. `Panels`, `sections` and `options` will register your settings, `config` will set default configuration to handle them all and `prefix` - is simply theme prefix for your settings.

### Panels

Customizer panels - is the collection of sections. You may group any Sections within Panels

To create customizer panel run

```bash
php broccoli new:customizer:panel <PanelName>
```

It will create `PanelName.php` inside `src/Customizer/Panels` with the following content

```php
namespace Theme\Customizer\Panels;

use Brocooly\Customizer\AbstractPanel;

class TestPanel extends AbstractPanel
{
	/**
	 * Panel id
	 * Same as `id` setting for `Kirki::add_panel()
	 *
	 * @var string
	 */
	public const PANEL_ID = 'test_panel';

	/**
	 * Panel settings
	 *
	 * Create panel for customizer sections
	 * Same array as arguments for `Kirki::add_panel()` or string if only title required
	 *
	 * @return array|string
	 */
	public function options(): array|string
	{
		return esc_html__( 'Test Panel', 'brocooly' );
	}
}
```

where `PANEL_ID` - is id for your panel. It used to group sections within this panel and it must be unique across all panels and sections. It is generated in a snake_case format, but feel free to change it. `options()` method accepts [same params](https://kirki.org/docs/setup/panels-sections/) as `Kirki::add_panel()` but in a most cases there are no need to pass them all. So if you return string value, it will be considered as a title for your section.

Next step is to register panel. Go into `customizer.php` and inside `panels` param just pass the panel class name

```php
use Theme\Customizer\Panels\TestPanel;

...

'panels'   => [
    TestPanel::class,
],
```

But nothing will happen. Why? Because panel has not any .
setting so it will not be rendered. That being said, let's register first section.

### Sections

You may create 'orphan' section without a panel or link it with `-p` flag

```php
php broccoli new:customizer:section <SectionName>
```

```php
namespace Theme\Customizer\Sections;

use Brocooly\Customizer\AbstractSection;
use Brocooly\Support\Facades\Mod;

class SimpleSection extends AbstractSection
{
	/**
	 * Section id
	 * Same as `id` setting for `Kirki::add_section()
	 *
	 * @var string
	 */
	public const SECTION_ID = 'simple_section';

	/**
	 * Panel settings
	 *
	 * Create panel for customizer sections
	 * Same array as arguments for `Kirki::add_panel()` or string if only title required
	 *
	 * @return array|string
	 */
	public function options(): array|string
	{
		return esc_html__( 'Simple Section', 'brocooly' );
	}


	/**
	 * Section controls
	 *
	 * @see https://kirki.org/docs/controls/
	 * @return array
	 */
	public function controls(): array
	{
		return [
			// Mod::text( 'example_setting', ['label' => esc_html__( 'Example setting', 'brocooly' ) ]),
		];
	}
}

```

It contains two general methods - `options()` and `controls()`. First one is for section options, like label, priority or parent panel. Second one is current section controls - like inputs, textarea, checkboxes, etc - basically, this is the WordPress theme mods, but extended by Kirki Framework and simplified by Brocooly.

!> Remember to register section inside `config/customizer.php` `sections` key.

If you uncomment `Mod` facade with `example_setting` inside Customizer panels you will see

## Site options

Options - is an "orphan" setting without custom section - in fact, no option can be set without section, so the only use case where it will be useful to generate option - is to register it within native WordPress customizer section such as "Title and tagline" etc

To generate it simply run
```php
php broccoli new:customizer:option <OptionName>
```

```php
namespace Theme\Customizer\Options;

use Brocooly\Customizer\AbstractOption;
use Brocooly\Customizer\WPSection;
use Brocooly\Support\Facades\Mod;

class HappyNewYear extends AbstractOption
{
	/**
	 * Create option instance
	 *
	 * This will create simple text option
	 * You need to specify WordPress section id
	 * For `Site Title & Tagline` it is `title_tagline`
	 *
	 * @link https://kirki.org/docs/controls/
	 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/#sections
	 * @return array
	 */
	public function settings(): array
	{
		return Mod::text(
			'example_text',
			[
				// 'section' => WPSection::TITLE_TAGLINE,
				'label'   => esc_html__( 'Example text', 'brocooly' ),
			],
		);
	}
}
```

This will generate text option inside "Title adn Tagline" section. The full list of nativae sections is

| Constant | Section id |
| ----- | ----- |
| `TITLE_TAGLINE` | `title_tagline` |
| `COLORS` | `colors` |
| `HEADER_IMAGE` | `header_image` |
| `BACKGROUND_IMAGE` | `background_image` |
| `NAV_MENUS` | `nav_menus` |
| `WIDGETS` | `widgets` |
| `STATIC_FRONT_PAGE` | `static_front_page` |
| `CUSTOM_CSS` | `custom_css` |