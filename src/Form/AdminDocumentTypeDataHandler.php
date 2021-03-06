<?php
/**
 * 2013-2019 Frédéric BENOIST
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * Use, copy, modification or distribution of this source file without written
 * license agreement from Frédéric BENOIST is strictly forbidden.
 *
 * INFORMATION SUR LA LICENCE D'UTILISATION
 *
 * L'utilisation de ce fichier source est soumise a une licence Academic Free License (AFL 3.0)
 * Toute utilisation, reproduction, modification ou distribution du present
 * fichier source sans contrat de licence ecrit de Frédéric BENOIST est
 * expressement interdite.
 *
 *  @author    Frédéric BENOIST
 *  @copyright 2013-2019 Frédéric BENOIST <https://www.fbenoist.com>
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

namespace FBenoist\FbSampleLegacyVsModern\Form;

use Validate;

use FBenoist\FbSampleLegacyVsModern\Model\DocumentType;
use PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataHandler\FormDataHandlerInterface;

class AdminDocumentTypeDataHandler implements FormDataHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $record = new DocumentType();
        // Insert new value
        $record->active = (int)$data['active'];
        $record->maxsize = (int)$data['maxsize'];
        $record->name = $data['name'];
        $record->description = $data['description'];
        return $record->save();
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $record = new DocumentType((int)$id);
        if (Validate::isLoadedObject($record)) {
            $record->active = (int)$data['active'];
            $record->maxsize = (int)$data['maxsize'];
            $record->name = $data['name'];
            $record->description = $data['description'];
        }
        // Update value
        return $record->save();
    }
}
