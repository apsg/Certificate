<?php
namespace Apsg\Certificate;

use Apsg\Certificate\Colors\BlackColor;
use Apsg\Certificate\Colors\ColorInterface;
use Apsg\Certificate\Fields\FieldInterface;
use Apsg\Certificate\Formats\A4PortraitFormat;
use Apsg\Certificate\Formats\FormatInterface;
use setasign\Fpdi\Fpdi;

class Certificate
{
    /** @var FormatInterface|null */
    protected $format;

    /** @var string|null */
    protected $background;

    /** @var ColorInterface */
    protected $textColor;

    /** @var array|FieldInterface[] */
    protected $fields = [];

    /** @var string */
    protected $font = "DejaVuSans";

    /** @var string */
    protected $fontFile = "DejaVuSans.php";

    protected $pdf;

    public function __construct(Fpdi $pdf = null, FormatInterface $format = null, ColorInterface $color = null)
    {
        $this->format = $format ?? new A4PortraitFormat();
        $this->textColor = $color ?? new BlackColor();

        $this->pdf = $pdf ?? new Fpdi();

        $this->pdf->addPage($this->format->orientation(), $this->format->size());
    }

    public function setBackground(string $backgroundPath) : self
    {
        $this->background = $backgroundPath;

        return $this;
    }

    public function textColor(ColorInterface $color) : self
    {
        $this->textColor = $color;

        return $this;
    }

    public function addField(FieldInterface $field) : self
    {
        $this->fields[] = $field;

        return $this;
    }

    public function setFont(string $font, string $file) : self
    {
        $this->font = $font;
        $this->fontFile = $file;

        return $this;
    }

    public function setFormat(FormatInterface $format) : self
    {
        $this->format = $format;

        $this->pdf = new Fpdi();
        $this->pdf->addPage($this->format->orientation(), $this->format->size());

        return $this;
    }

    public function generate()
    {
        $this->pdf->AddFont($this->font, '', $this->fontFile);
        $this->pdf->SetFont($this->font, '', 12);
        $this->pdf->SetTextColor($this->textColor->r(), $this->textColor->g(), $this->textColor->b());

        if (!empty($this->background)) {
            $this->pdf->Image($this->background, 0, 0, $this->format->width(), $this->format->height());
        }

        foreach ($this->fields as $field) {
            $this->generateField($field);
        }

        return $this->pdf->Output();
    }

    protected function generateField(FieldInterface $field) : void
    {
        $this->pdf->SetXY($field->x(), $field->y());
        $this->pdf->SetFont($this->font, '', $field->size());
        $this->pdf->cell("0", "0", $field->text(), 0, 1, $field->align());
    }
}
