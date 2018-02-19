select 
    firstNameKanji,
    lastNameKanji,
    firstNameKana,
    lastNameKana,
    birthday,
    telephone,
    zipnum,
    prefecture,
    city,
    address,
    res.value as residenceType,
    emp.value as employementType,
    officeName,
    officeZipnum,
    officeTelephone,
    officeCity,
    officeAddress,
    ser.value as serviceLength,
    ear.value as earning,
    bor.value as borrow,
    del.value as delayed_repayment,
    fam.value as familyType,
    ass.value as assetAmount,
    inc.value as incomeType,
    purposeSettlement,
    purposeTrade,
    purposeInvest,
    cir.value as circumstances,
    circumstancesText,
    experienceFx,
    experienceStock,
    experienceCredit,
    experienceOption,
    experienceFuture,
    lawFlag_regidence,
    lawFlag_tax,
    lawFlag_official
    
from user u 
    inner join
        asset_amount ass
        on u.assetAmount = ass.key
    inner join
        borrowing bor
        on u.borrow = bor.key
    inner join
        circumstances cir
        on u.circumstancesType = cir.key
    inner join
        delayed_repayment del
        on u.delayed_repayment = del.key
    inner join
        earning ear
        on u.earning = ear.key
    inner join
        employement_type emp
        on u.employementType = emp.key
    inner join
        family_type fam
        on u.familyType = fam.key
    inner join
        home_type hom
        on u.residenceType = hom.key
    inner join
        income_type inc
        on u.incomeType = inc.key
    inner join
        invest_experience inv
        on u.experienceFx = inv.key
    inner join
        residence_type res
        on u.residenceType = res.key
    inner join
        service_length ser
        on u.serviceLength = ser.key
    
    