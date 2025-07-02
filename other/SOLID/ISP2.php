<?php

//Задание 2:
//У вас есть интерфейс MediaPlayer с методами playAudio, playVideo и recordAudio.
//Класс SimpleAudioPlayer воспроизводит только аудио.
//Переработайте код, чтобы он соответствовал ISP.
//Напишите код и покажите, как использовать новые классы.

interface AudioPlayable {
    public function playAudio(): string;
}
interface VideoPlayable
{
    public function playVideo(): string;
}
interface AudioRecorderInterface
{
    public function recordAudio(): string;
}

class SimpleAudioPlayer implements AudioPlayable {
    public function playAudio(): string {
        return "Воспроизвожу аудио";
    }
}

class VideoPlayer implements VideoPlayable, AudioPlayable{

    public function playAudio(): string
    {
        return "Воспроизвожу аудио";
    }

    public function playVideo(): string
    {
        return "Воспроизвожу видео";
    }
}

class Smartphone implements VideoPlayable, AudioPlayable, AudioRecorderInterface{

    public function playAudio(): string
    {
        return "Воспроизвожу аудио";
    }

    public function playVideo(): string
    {
        return "Воспроизвожу видео";
    }

    public function recordAudio(): string
    {
        return "Записываю аудио";
    }
}

$simpleAudioPlayer = new SimpleAudioPlayer();
$videoPlayer = new VideoPlayer();
$smartphone = new Smartphone();

echo $simpleAudioPlayer->playAudio().PHP_EOL;
echo $videoPlayer->playAudio().PHP_EOL;
echo $videoPlayer->playVideo().PHP_EOL;
echo $smartphone->playAudio().PHP_EOL;
echo $smartphone->playVideo().PHP_EOL;
echo $smartphone->recordAudio().PHP_EOL;
