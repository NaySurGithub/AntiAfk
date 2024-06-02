# Anti-AFK Plugin for PocketMine-MP

## Description
Anti-AFK is a plugin for PocketMine-MP that prevents players from being idle for too long. This helps maintain an active and engaged player base by automatically taking action when players are detected as AFK (Away From Keyboard).

## Features
- Detects and manages AFK players.
- Configurable AFK detection time.
- Customizable actions for AFK players (e.g., kick, message).
- Options to consider jumping and sneaking as activity.
- Ability to ignore specific worlds.

## Requirements
- PocketMine-MP API version: 5.0.0

## Installation

1. **Download the Plugin**

   Download the latest release of the Anti-AFK plugin from the [releases page](https://github.com/NaySurGithub/AntiAfk/releases).

2. **Install the Plugin**

   Place the downloaded `AntiAFK.phar` file in the `plugins` directory of your PocketMine-MP server.

   ```
   ./plugins/AntiAFK.phar
   ```

3. **Start the Server**

   Start or restart your PocketMine-MP server to load the Anti-AFK plugin.

   ```
   ./start.sh
   ```

4. **Configuration**

   After the server has started, a configuration file (`config.yml`) will be created in the `plugins/AntiAFK` directory. You can edit this file to customize the plugin settings.

   ```yaml
   # config.yml example
   afk-timeout: 10  # temps en secondes avant de kicker un joueur inactif
   jump: false  # si le joueur saute, ça compte comme s'il n'est pas AFK (true = oui / false = non)
   sneak: false  # si le joueur sneak, ça compte comme s'il n'est pas AFK (true = oui / false = non)
   kick-message: "Vous avez été kické pour inactivité."  # message à afficher au joueur kické
   worlds:  # liste des mondes à ignorer
     - world1
     - world2
     - world3
   ```

## Usage

Once installed and configured, the plugin will automatically detect and manage AFK players according to the settings specified in the `config.yml` file.

## Contributing

If you would like to contribute to the development of this plugin, feel free to fork the repository and submit a pull request. Contributions are welcome!

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contact

For any questions or support, you can contact the developer Nay via [GitHub](https://github.com/NaySurGithub) or via Discord : naytasoeur.

---
