-- ==============================================================================
-- SCRIPT SQL: database.sql
-- Contém instruções DDL (Criação do Banco/Tabelas) e DML (Carga Inicial/Seed)
-- ==============================================================================
-- Desabilita a checagem de chaves estrangeiras temporariamente para evitar erros ao recriar
SET FOREIGN_KEY_CHECKS = 0;
-- ==============================================================================
-- 1. INSTRUÇÕES DDL (Data Definition Language)
-- Criação das tabelas e relacionamentos
-- ==============================================================================
-- Tabela de Usuários (Padrão Laravel)
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email_verified_at` timestamp NULL DEFAULT NULL,
    `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_email_unique` (`email`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- Tabela de Equipamentos
DROP TABLE IF EXISTS `equipamentos`;
CREATE TABLE `equipamentos` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `modelo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `fabricante` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `numero_serie` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `data_aquisicao` date DEFAULT NULL,
    `status` enum('Ativo', 'Manutenção', 'Inativo', 'Disponível') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Disponível',
    `valor_estimado` decimal(10, 2) DEFAULT NULL,
    `localizacao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `descricao` text COLLATE utf8mb4_unicode_ci,
    `user_id` bigint(20) unsigned NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `equipamentos_numero_serie_unique` (`numero_serie`),
    KEY `equipamentos_user_id_foreign` (`user_id`),
    CONSTRAINT `equipamentos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- ==============================================================================
-- 2. INSTRUÇÕES DML (Data Manipulation Language)
-- Inserção da carga de dados obrigatória
-- ==============================================================================
-- Inserindo Usuários do Sistema
-- NOTA SOBRE AS SENHAS: O Laravel exige que a senha seja criptografada via Bcrypt.
-- Para o usuário conseguir logar via aplicação, utilizei um hash Bcrypt padrão do 
-- Laravel cujo valor em texto puro é a palavra: password
-- (Caso vá testar o login na tela, use login: admin / senha: password)
INSERT INTO `users` (
        `id`,
        `name`,
        `email`,
        `password`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Administrador',
        'admin',
        '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        NOW(),
        NOW()
    ),
    (
        2,
        'Professor',
        'prof',
        '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        NOW(),
        NOW()
    );
-- Inserindo Catálogo de Equipamentos (Estoque Inicial)
-- OBS: O status 'Emprestado' foi adaptado para 'Inativo' para respeitar a regra do ENUM do banco.
-- Todos os equipamentos estão associados ao Administrador (user_id = 1).
INSERT INTO `equipamentos` (
        `nome`,
        `descricao`,
        `status`,
        `user_id`,
        `created_at`,
        `updated_at`
    )
VALUES (
        'Notebook Dell Latitude',
        'Processador i5, 8GB RAM, Etiqueta #001',
        'Disponível',
        1,
        NOW(),
        NOW()
    ),
    (
        'Projetor Epson PowerLite',
        'Cabo HDMI e Controle Remoto inclusos',
        'Inativo',
        1,
        NOW(),
        NOW()
    ),
    (
        'Kit Arduino Uno R3',
        'Acompanha protoboard e jumpers',
        'Disponível',
        1,
        NOW(),
        NOW()
    ),
    (
        'Osciloscópio Digital',
        'Modelo 2 Canais 100MHz',
        'Inativo',
        1,
        NOW(),
        NOW()
    ),
    (
        'Câmera Canon DSLR',
        'Lente 50mm, Bateria extra',
        'Disponível',
        1,
        NOW(),
        NOW()
    );
-- Reabilita a checagem de chaves estrangeiras
SET FOREIGN_KEY_CHECKS = 1;