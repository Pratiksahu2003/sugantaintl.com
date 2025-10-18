<?php

namespace App\Services;

class CurrencyService
{
    /**
     * Get all available currencies
     */
    public static function getCurrencies(): array
    {
        return config('currencies.currencies', []);
    }

    /**
     * Get currency codes only
     */
    public static function getCurrencyCodes(): array
    {
        return array_keys(config('currencies.currencies', []));
    }

    /**
     * Get currency name by code
     */
    public static function getCurrencyName(string $code): string
    {
        return config("currencies.currencies.{$code}.name", $code);
    }

    /**
     * Get currency symbol by code
     */
    public static function getCurrencySymbol(string $code): string
    {
        return config("currencies.currencies.{$code}.symbol", $code);
    }

    /**
     * Get currency symbol position
     */
    public static function getCurrencySymbolPosition(string $code): string
    {
        return config("currencies.currencies.{$code}.symbol_position", 'before');
    }

    /**
     * Format amount with currency
     */
    public static function formatAmount(float $amount, ?string $currency = null): string
    {
        $currency = $currency ?: config('currencies.default');
        $symbol = self::getCurrencySymbol($currency);
        $position = self::getCurrencySymbolPosition($currency);
        
        $formattedAmount = number_format($amount, 2);
        
        return $position === 'before' 
            ? $symbol . ' ' . $formattedAmount 
            : $formattedAmount . ' ' . $symbol;
    }

    /**
     * Get default currency
     */
    public static function getDefaultCurrency(): string
    {
        return config('currencies.default', 'USD');
    }

    /**
     * Check if currency is supported
     */
    public static function isSupported(string $code): bool
    {
        return array_key_exists($code, self::getCurrencies());
    }

    /**
     * Get currencies for select options
     */
    public static function getSelectOptions(): array
    {
        $currencies = self::getCurrencies();
        $options = [];
        
        foreach ($currencies as $code => $currency) {
            $options[$code] = $code . ' - ' . $currency['name'];
        }
        
        return $options;
    }
}
