# Big Close Button plugin

A plugin to add a big button to the chat box.

Based on the idea from [this issue](https://github.com/Mibew/mibew/issues/144).

## Installation

1. Get the archive with the plugin sources. You can download it from the
[official site](https://mibew.org/plugins#mibew-big-close-button) or build the
plugin from sources.

2. Untar/unzip the plugin's archive.

3. Put files of the plugins to the `<Mibew root>/plugins`  folder.

4. (optional) Add plugins configs to "plugins" structure in
"`<Mibew root>`/configs/config.yml". If the "plugins" stucture looks like
`plugins: []` it will become:
    ```yaml
    plugins:
        "Mibew:BigCloseButton": # Plugin's configurations are described below
            operation_mode: dismiss
    ```

5. Navigate to "`<Mibew Base URL>`/operator/plugin" page and enable the plugin.

## Plugin's configurations

The plugin can be configured with values in "`<Mibew root>`/configs/config.yml" file.

### config.operation_mode

Type: `String`

Default: `close`

Operation mode (i.e. how the button acts on click). At the moment there are two options
available: `close` (close chat box and end the chat) and `dismiss` (just close chat box solely).

## Build from sources

There are several actions one should do before use the latest version of the plugin from the repository:

1. Obtain a copy of the repository using `git clone`, download button, or another way.
2. Install [node.js](http://nodejs.org/) and [npm](https://www.npmjs.org/).
3. Install [Gulp](http://gulpjs.com/).
4. Install npm dependencies using `npm install`.
5. Run Gulp to build the sources using `gulp default`.

Finally `.tar.gz` and `.zip` archives of the ready-to-use Plugin will be available in `release` directory.

## License

[Apache License 2.0](http://www.apache.org/licenses/LICENSE-2.0.html)
