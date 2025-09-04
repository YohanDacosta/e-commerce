<?php

namespace App\Serializer;

use App\Entity\Product;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Vich\UploaderBundle\Storage\StorageInterface;

class MediaObjectNormalizer implements NormalizerInterface
{

  private const ALREADY_CALLED = 'MEDIA_OBJECT_NORMALIZER_ALREADY_CALLED';

  public function __construct(
    private readonly NormalizerInterface $normalizer,
    private readonly StorageInterface $storage
  ) {
  }

  public function normalize($object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
  {
    $context[self::ALREADY_CALLED] = true;

    $object->contentUrl = $this->storage->resolveUri($object, 'file');

    return $this->normalizer->normalize($object, $format, $context);
  }

  public function supportsNormalization($data, ?string $format = null, array $context = []): bool
  {

    if (isset($context[self::ALREADY_CALLED])) {
      return false;
    }

    return $data instanceof Product;
  }

  public function getSupportedTypes(?string $format): array
  {
    return [
      Product::class => true,
    ];
  }
}