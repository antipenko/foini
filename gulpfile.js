var gulp = require('gulp'),
    sass = require('gulp-sass')
    browserSync = require('browser-sync'); //Подключаем Sass пакет


gulp.task('sass', function () {
  return gulp.src('scss/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('css/'))
    .pipe(browserSync.reload({stream: true})) // Обновляем CSS на странице при изменении
});

gulp.task('browserSync', function() { // Создаем таск browser-sync
    browserSync({ // Выполняем browser Sync
        server: { // Определяем параметры сервера
            baseDir: './' // Директория для сервера
        },
        //notify: false // Отключаем уведомления
    });
});

gulp.task('watch', ['browserSync', 'sass'], function() {
    gulp.watch('scss/**/*.scss', ['sass']); // Наблюдение за sass файлами
    gulp.watch('*.html', browserSync.reload); // Наблюдение за HTML файлами в корне проекта
    gulp.watch('js/**/*.js', browserSync.reload); // Наблюдение за JS файлами в папке js
});
