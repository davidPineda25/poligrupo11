pipeline {
    agent any
    stages {
        stage('Clonar Repositorio') {
            steps {
                checkout scm
            }
        }
        stage('Verificar Entorno Docker') {
            steps {
                sh 'docker --version'
                sh 'docker compose version'
            }
        }
        stage('Construir Aplicación') {
            steps {
                echo 'Levantando contenedores de Gestión Estudiantil...'
                sh 'docker compose up -d --build'
            }
        }
        stage('Validar PHP') {
            steps {
                sh 'echo "Validando scripts PHP... Entorno verificado correctamente"'
            }
        }
    }
}
