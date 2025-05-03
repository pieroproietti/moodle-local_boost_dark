# README

moodle-local_boost_dark è un plugin che fornisce una icona per passare in modalità dark.

## moodledev ISO live
moodledev è una semplice live Debian bookworm, adattata per lo sviluppo con moodle, la puoi trovare sul mio [googledrive](https://drive.google.com/drive/folders/18QIqicyecLMuU1Zmb2E039gWawzZuy3e?dmr=1&ec=wgc-drive-globalnav-goto) e scaricarla.

Avviata la live, potete utilizzarla così com'è, oppure installare il sistema utilizzando l'installer grafico calamares.

## Installazione su moodledev

```
cd $HOME
git clone https://github.com/pieroproietti/moodle-local_boost_dark
rm -f /var/www/html/moodle/local/boost_dark
ln -s $HOME/moodle-local_boost_dark /var/www/html/moodle/local/boost_dark
```

